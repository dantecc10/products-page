@echo off
color 0a
@echo on
D:
cd "D:\Repos\products-page"
git pull 
git status
git add *
git commit -m "Commit desencadenado por .bat"

git push
