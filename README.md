# RESTFUL BLOG API

## A RESTFUL API of a simple Blog API that covers the following problems:

1. – [x] Getting all blog posts
2. – [x] Getting blog posts with pagination
3. – [x] Getting post by id
4. – [x] Creating blog
5. – [x] Updatting blog
6. – [x] Deleting blog
7. – [x] Adding comment to a blog post
8. – [x] Getting single comment on a blog post
9. – [x] Getting all comments on a blog post(as an array of objects, in each object I want to see the comment and the comment Id.)
10. – [x] Editing comment on a blog post using the comment Id
11. [x] Deleting comment on a blog post using the comment Id

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

Things you need to install the software and how to install them

```
You need to have a xampp installed on your local machine
You need to have a browser installed on your local machine
You need to import the maven_db.sql file to your database
```

### Installing

A step by step series of examples that tell you how to get a development env running

```
First, download the zip file (maven-main.zip)
Next, extract or unzip the file
Next, copy the Maven folder to this directory in your local drive C:\xampp\htdocs
so the full path of the folder should be C:\xampp\htdocs\Maven
Next, install or inport the Maven_db.sql file with the instructions below
Next, start your apache or xampp
```
Next, go to your browser and past or enter this link http://localhost:8090/Maven.com/  or http://localhost:8080/Maven.com/ or click [Maven News](http://localhost:8090/Maven.com/) - to load the app.

At this point you should see a page with Heading (Welcome to Maven News) and blog post list.


## Maven_db.sql installation instruction

* Open your browser, copy and paste this link [PhpmyAdmin](http://localhost:8090/phpmyadmin/) and click enter
* Click on **import**
* Chose file. Select the maven_db.sql file from your zip files and click **Go**

If you can't access the link, click [here](http://localhost:8090/phpmyadmin/) and follow the instructions again.

## Running the tests

How to run the automated tests for this app

```
First, Register or Login a new/default user (Default Login Details Below). Go to Account -> Login/Register.
Next, Add a new Category. To create a Category, go to New Post -> New category -> Add Category.
Next, Add a new Post. To create a Post, go to New Post -> Add Post and enter Post Title & Description.
Next, Add a coment. To create a Comment on a Post, go to New Comment, enter your comment and sellect a post from the list for the comment.

To View, Edit or Delete a Category, Post or Comment, go to Action and sellect view, edit or delete.
```

### Areas & Actions to check

```
To create a post, you need to have an account. Basic Login & Registration was integrated. You can test both by creating a new user account, or login with the default user account details:

Email: sachiel.kemmer@gmail.com
Password: password

Deleting a Blog Post also deletes all Associated Comments.
Deleting a Category also deletes all Associated Posts.
Deleting a User also deletes all Associated Categories, Post/Tags & Comments.

Pagination was also implemented.
```

## Built With

* [CakePHP](https://cakephp.org/) - The web framework used
* [Composer](https://getcomposer.org/) - Dependency Management
