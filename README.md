<p>
  <h1 align="center"><b>E-commerce</b></h1>
</p>

<p>
  <h4 align="center"><b>A multi vendor e-commerce website with admin panel, seller panel and deliveryboy panel</b></h4>
</p>

<p align="center"> 
    <img alt="All Stars" src="https://visitor-badge.laobi.icu/badge?page_id=detronetdip.E-commerce"/>&nbsp;
    <img src="https://img.shields.io/github/stars/detronetdip/E-commerce" />
    &nbsp;
    <img src="https://img.shields.io/github/forks/detronetdip/E-commerce" />&nbsp;
    <img src="https://img.shields.io/github/repo-size/detronetdip/E-commerce"/>
    &nbsp;
    <img src="https://img.shields.io/github/last-commit/detronetdip/E-commerce"/>
</p>

<p>
  <h4 align="center"><i>Build with ❤️ and</i></h4>
</p>
<p align="center"> 
    <img alt="HTML5" src="https://img.shields.io/badge/HTML5-E34F26?&logo=html5&logoColor=white"/>&nbsp;
    <img src="https://img.shields.io/badge/CSS3-1572B6?&logo=css3&logoColor=white" alt="CSS3" />
    &nbsp;
    <img src="https://img.shields.io/badge/JavaScript-323330?&logo=javascript&logoColor=F7DF1E" alt="JAVASCRIPT" />&nbsp;
    <img src="https://img.shields.io/badge/PHP-777BB4?&logo=php&logoColor=white" alt="PHP"/>
    &nbsp;
    <img src="https://img.shields.io/badge/MySQL-005C84?&logo=mysql&logoColor=white" alt="MYSQl"/>
    &nbsp;
    <img src="https://img.shields.io/badge/Docker-2CA5E0?logo=docker&logoColor=white" alt="docker"/>
</p>

### How to run

  You can run this project by manually setting up everything or you can simply run it with docker or docker-compose to avoid overhead hustles

### Run with docker

  To run this with docker please run the following commands.
  ***Please make sure that docker is installed in your system.***
  
  ```
   > git clone https://github.com/detronetdip/E-commerce.git
   > cd {to your cloned path}/E-commerce/
   > docker build -t app -f Dockerfile .
   > cd database
   > docker build -t app_database -f Dockerfile .
   > docker run \
       --name database \
       -e MYSQL_ROOT_PASSWORD='passwd' \
       -p 9306:3306 app_database
   > docker run --name web_app -p 3000:80 app
  ```
  - Go to your browser and type `http://localhost:3000` and the whole project is ready to use.

### Run with docker-compose

  To run this with docker-compose please run the following commands.
  ***Please make sure that docker and docker-compose is installed in your system.***
  
  ```
   > git clone https://github.com/detronetdip/E-commerce.git

   > cd {to your cloned path}/E-commerce/`

   > docker-compose up -d --build
  ```
  - Go to your browser and type `http://localhost:3000` and the whole project is ready to use.
  - ***if you initialy encoutered connection refused error please wait for few seconds and relod the page.**