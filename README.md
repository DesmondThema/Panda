
![Screenshot 2023-12-06 at 19 41 29](https://github.com/DesmondThema/Panda/assets/25475754/b02ea7a6-5af3-4470-9c29-7b6add702d0b)

## About PandaDash 

PandaDash is a straightforward dashboard designed for presenting, visualizing, and interacting with information obtained through the Panda API.

## About PandaDash 
- Authentication with a bearer token
- View a list of all forest sessions
- Filter forest sessions by highlight and/or date.
- Line chart showing number of sessions per day
- Cards showing total number of upcoming sessions and keywords 

## Local Installation
## Requirements: PHP 8.1 
1. Clone this repo 
`git clone https://github.com/DesmondThema/Panda.git`
2. cd into project
`cd panda`
3. Install composer 
`composer install`
4. Copy the .env.example file and rename it to .env
`cp .env.example .env`
5. Fill in the USER_EMAIL and USER_PASSWORD in .env file.
6. Install NPM Dependencies 
`npm install && npm run dev`
7. Run the application
`php artisan serve`
