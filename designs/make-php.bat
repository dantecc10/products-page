@echo off
color 0a

@echo on
setlocal enabledelayedexpansion

set "dir=%cd%"

for %%i in ("%dir%\*.html") do (
    set "filename=%%~ni"
    set "extension=%%~xi"
    copy "%%i" "!filename!.php"
)

echo Archivos .html copiados y convertidos a .php en el directorio actual.

commit-deploy.bat