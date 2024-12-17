# 👨🏽‍💻 ListOfApliedJobs
This project is an API that collects data from a list about the offers that you aplied. The data of the offers aplied is displayed in the Home page with a table, and the news and follows of a certain offer aplied are displayed in the specific page of that offer with a table and cards.


## 🌄 Project views  
<div>
<img width=300 src="public/img/MainView.png" alt="">
<img width=300 src="public/img/SecondTableView.png" alt="">
<div>

## 💻 Languages ​​and tools  
![](https://skillicons.dev/icons?i=php,html,css,js)
![](https://skillicons.dev/icons?i=laravel,git,github,vscode,)

<p>
<img src="https://static.vecteezy.com/system/resources/previews/032/329/175/non_2x/canva-icon-logo-symbol-free-png.png" alt="Incono azul de Canvas" width="50" style="margin-right: 3px"/>
</p>

## ⚙️ Installation prerequisites
🟢Install [Node.js](https://nodejs.org/en/download/source-code)

🟢Install [Composer](https://getcomposer.org/download/)

## 🛠️ Installation Guide 
· Before starting to install the project, you will need to create a database (we have used mysql via xampp) and name it: `jobfinding`

· Open a terminal in the folder where you want the repository to be cloned and enter this command:

`git clone https://github.com/Kalixto73a/ListOfApliedJobs.git`

 As you clone the repository, it will appear all the elements on it; you need to rename the file ".env.example" to ".env" and fill it with theese values:

<img width=370 src="public/img/Database.png">


· In your preferred environment, open the project you cloned; you will need three consoles for the next step.

▷First Console:
    `npm install` `npm run dev`
    
▷Second Console:
    `composer install` `php artisan serve`
    
▷Third Console: 
    `php artisan migrat:fresh`
    `php artisan migrat:fresh --seed`
    
· In the second console that you have opened, press the ctrl key and click on the link to localhost that it offers you. It should take you to the main view of the project where the offers are located.

⚠️ If you have done the previous steps and the view has not opened correctly, go back to the third command console and enter this:

`php artisan key:generate` `php artisan config:cache` 

## 🌐 Endpoints 
This project has 6 endpoinst.

### ✏️ Create (POST)
`http://127.0.0.1:8000/api/jobs`

### ✏️ Create A New Follow of an Offer (POST)
`http://127.0.0.1:8000/api/jobs/{jobId}/follows`

### 📖 Read All Offers (GET)
`http://127.0.0.1:8000/api/jobs`

### ✏️✏️ Update (PUT)
`http://127.0.0.1:8000/api/jobs/{jobId}`
<br>
>Here you can only change the value of Status to:
><br>
>0 = Finalizado
><br>
>1 = En curso

### ❌ Destroy (DELETE)
`http://127.0.0.1:8000/api/jobs/{jobId}`

### 👁️ Show (GET)
`http://127.0.0.1:8000/api/jobs/{jobId}/follows`

## 💀 Tests 
All tests passed. Introduce this line on your console to check it:

`./vendor/bin/phpunit tests`

<p align="center">
  <img src="public/img/PhpUnitTest.png" alt="" width="500"/>
</p>

If you want to launch the tests and view them you can put these commands in console 3:

`php artisan test --coverage` `php artisan test --coverage-html=coverage-report`

<p align="center">
  <img src="public/img/CoverageTest.png" alt="Descripción de la imagen" width="500"/>
</p>

<p align="center">
  <img src="public/img/CoverageTestReport.png" alt="Descripción de la imagen" width="500"/>
</p>

## 🗂️ Diagram made (DDBB) 
I used [drawSQL](https://drawsql.app) to do the correct structure of the DDBB

<p align="center">
  <img src="public/img/DrawSQL.png" alt="Descripción de la imagen" width="600"/>
</p>


## 👩‍💻 Authors
- [Alvaro Cervera Vigara](https://github.com/Kalixto73a)
