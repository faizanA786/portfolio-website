from flask import Flask, request, redirect, send_from_directory
from jinja2 import Environment, FileSystemLoader
from datetime import datetime
import sqlite3 as sq

app = Flask(__name__)
env = Environment(loader=FileSystemLoader("."))

def add_record(title, description):
    with sq.connect("blogs.db") as connect:
        db = connect.cursor()
        date_added = datetime.now().strftime("%Y-%m-%d")
        db.execute("INSERT INTO blogs (title, description, date_added) VALUES (?, ?, ?)", (title, description, date_added))

def overwrite_blog():
    with sq.connect("blogs.db") as connect:
        db = connect.cursor()
        db.execute("SELECT title, description, date_added FROM blogs ORDER BY date_added DESC")
        blogs = db.fetchall()

    template = env.get_template("blog_template.html")
    new_html = template.render(blogs=blogs)

    with open('docs/blog.html', 'w', encoding='utf-8') as f:
        f.write(new_html)

@app.route('/add-entry', methods=["GET", "POST"]) # add entry page
def submit_blog():
    if request.method == "POST":
        title = request.form.get("title")
        description = request.form.get("description")

        if not title or not description:
            return "Missing title or description", 400
        
        add_record(title, description)
        overwrite_blog()
        print("successful!")
    
    return send_from_directory(".", "addBlog.html") # if no submission, direct to add blog page

@app.route("/") # index
def home():
    return send_from_directory(".", "addBlog.html")

if __name__ == '__main__':
    app.run(debug=True)