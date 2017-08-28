# cs4753-project

## Setup for development
1. Download [XAMPP](https://www.apachefriends.org/index.html)
2. In your terminal, locate the **XAMPP** folder and the **htdocs** subdirectory
3. Inside **htdocs** run the command `git clone https://github.com/bradymadden97/cs4753-project.git`
4. `cd` into cs4753-project subdirectory.
5. Set remote upstream to GitHub with the command `git remote add origin https://github.com/bradymadden97/cs4753-project.git`
6. Open **XAMPP** control panel
7. Click ``Start`` for **Apache**
8. In a browser type `localhost/cs4753-project`

## Develop
1. Pull new changes from github inside `cs4753-project` directory using `git pull`
2. Edit files in `../XAMPP/htdocs/cs4753-project`
3. Test using XAMPP control panel and localhost
4. `git add .` and `git commit -m "commit message"` to commit changes
5. `git push -u origin master` to push changes to GitHub. `git push` can be used after your first push
