To Do List Database Project

Bryan Borgeson and Brian Kropff

03-19-2015

Expand original to-do list project to interact with backend database for storing to-dos and categories of to-dos.


##TO DO Application w/ SQL DB

###Developers
Bryan Borgeson and Brian Kropff

###Date
March 17 2015

###Purpose
This To Do app is a project at Epicodus that is assigned in the third week when the concept of databases is introduced.  It is intended to expand the student's knowledge of REpresentational State Transfer (REST) and Create, Read, Update, Delete (CRUD).

###Description
The To Do app allows the user to create categories of tasks, and populate those categories with individual tasks.

###Use and Editing
To use this app, download the source code and run it in on your php server.  To edit the app, download the source code and open it in your text editor.
You will also need to create a database backend (we used postgres sql), named to_do, with two tables, categories and tasks.  Categories has two columns--id and names.  Tasks has three columns--id, description, and category_id.

*Note: If you are copying any of the code to your own directories, you may need to install Composer in your root directory.*

###Copyright (c) 2015 Bryan Borgeson and Brian Kropff

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
