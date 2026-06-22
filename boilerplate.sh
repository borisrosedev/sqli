#!/bin/bash

# 🚀 Instruction pour configurer un dépôt local ( référentiel  local ) git

if [ ! -d ".git" ]; then
    git init 
    git remote add origin git@github.com:borisrosedev/sqli.git
    echo "# sqli" >> README.md
    git add README.md
    git commit -m "🚀 first commit"
    git branch -M main
    git push -u origin main
fi 
