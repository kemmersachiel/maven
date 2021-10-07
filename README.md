# RESTFUL BLOG API

## A RESTFUL API of a simple Blog API that covers the following problems:

1. [x] Getting all blog posts
2. [x] Getting blog posts with pagination
3. [x] Getting post by id
4. [x] Creating blog
5. [x] Updatting blog
6. [x] Deleting blog
7. [x] Adding comment to a blog post
8. [x] Getting single comment on a blog post
9. [x] Getting all comments on a blog post
10. [x] Editing comment on a blog post using the comment Id
11. [x] Deleting comment on a blog post using the comment Id

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for testing purposes.

### Prerequisites

Things you need to install and download in order to test the application.

```
You need to have a Xampp installed on your local machine
You need to download the Maven-main.zip file to your local machine
You need to import the maven_db.sql file to your database
```

Download <a href="https://www.apachefriends.org/download.html">**Xampp**</a>


### Installing

A step by step series of examples that tells you how to get a testing environment running.

```
1. Download and install Xampp on your local machine.
2. Download the mavin-main.zip file and extract or unzip the file to this directory in your local drive C:\xampp\htdocs.
   So the full path to the folder should be C:\xampp\htdocs\maven-main\
3. Read and follow the Database Installation Instructions bellow.
```


## Database Installation Instructions

How to install Application's Database

* Copy and paste this link [PhpmyAdmin](http://localhost/phpmyadmin/) on your browser
* Click on **import**
* Click on **Choose File** and select the **maven_db.sql** file from your zip files and click **Go**.
* Click [maven-main](http://localhost/maven-main/) to access the Application.

**Note:** If you can't access phpmyadmin, chech your Xampp installation again.

At this point, you have successfully completed your Installation and your Testing Environment is ready. Click [maven-main](http://localhost/maven-main/) to access the Application.

## Running and Testing the Application

How to run the automated tests for this Application

```
First, Register or Login a new/default user (Default Login Details Below). Go to Account -> Login/Register.
Next, Add a new Category. To create a Category, go to New Post -> New category -> Add Category.
Next, Add a new Post. To create a Post, go to New Post -> Add Post and enter Post Title & Description.
Next, Add a coment. To create a Comment on a Post, go to New Comment, enter your comment and sellect a post from the list for the comment.

To View, Edit or Delete a Category, Post or Comment, go to Action and sellect view, edit or delete.
```

### Areas & Actions to Check

```
1. To create a post, you need to have an account.
2. Basic Login & Registration was integrated.
3. You can test both by creating a new user account, or login with the default user account details:

Email: defaultuser@email.com
Password: password

4. Deleting a Blog Post also deletes all Associated Comments.
5. Deleting a Category also deletes all Associated Posts.
6. Deleting a User also deletes all Associated Categories, Post/Tags & Comments.
7. Pagination was also implemented.

This Application is just for Testing Purposes, much more can be done on a live project with other frameworks.
```

## Application Built With

* [CakePHP](https://cakephp.org/) - The web framework used
* [Composer](https://getcomposer.org/) - Dependency Management
