## Set Up Laravel Project

1. Clone the repository.

   ```
   git clone https://github.com/ichiyan/Doggo.git
   ```
2. cd into project.
3. Install composer dependencies.

    ```
    composer install
    ```
4. Install npm dependencies.

    ```
    npm install
    ```
5. Create a copy of .env file.

    ```
    cp .env.example .env
    ```
6. Generate an app encryption key.

    ```
    php artisan key:generate
    ```

7. Create an empty database for the application.

8. In the .env file, add database information. Fill in the ```DB_HOST```, ```DB_PORT```, ```DB_DATABASE```, ```DB_USERNAME```, and ```DB_PASSWORD``` options to match the credentials of the database you    just created.

9. Publish schema to database.

    ```
    php artisan migrate
    ```
10. Seed the database.

    ```
    php artisan db:seed
    ```

11. Link storage.

    ```
    php artisan storage:link
    ```
    
12. Run the application. 
  
    ```
    php artisan serve
    ```

## Sample Login Credentials

| | | |
|:-------------------------:|:-------------------------:|:-------------------------:|
| **email address** | **password** | **permissions** |
| regular@gmail.com | regularp@ssw0rd | view, bookmark, and reserve posts |
| pcci@gmail.com  | pccip@ssw0rd | view, bookmark, reserve, create, and edit posts |

## Screenshots

![1 landing_page_hero](https://user-images.githubusercontent.com/74673566/232227651-077ce1cd-9880-4527-9d7d-0537c835557f.png)

| | | 
|:-------------------------:|:-------------------------:|
|<img width="1604" alt="landing page" src="https://user-images.githubusercontent.com/74673566/232223505-83143e9f-e472-443e-9890-749a28e86f27.png"> | <img width="1604" alt="login" src="https://user-images.githubusercontent.com/74673566/232223611-28e2f124-5424-42dd-9dcb-a92d7a328b45.png"><img width="1604" alt="register" src="https://user-images.githubusercontent.com/74673566/232223622-34268662-d0f6-4148-92a7-575ccd5e37dc.png">|


| | | 
|:-------------------------:|:-------------------------:|
|<img width="1604" alt="shop" src="https://user-images.githubusercontent.com/74673566/232229485-94b99f73-f0fc-4760-b8c0-01beb06045c4.png"> | <img width="1604" alt="post details" src="https://user-images.githubusercontent.com/74673566/232229503-eceb6a46-6d27-4946-84f4-70aace2c47d9.png">|
|<img width="1604" alt="profile all posts" src="https://user-images.githubusercontent.com/74673566/232229760-4d97bdad-03ef-4fe2-a01e-a14e5ab1afdc.png"> | <img width="1604" alt="profile bookmarked posts" src="https://user-images.githubusercontent.com/74673566/232229763-35ed6710-991c-41c1-bd2b-eae8284ab8b9.png">|
|<img width="1604" alt="new post" src="https://user-images.githubusercontent.com/74673566/232229932-7c57f58d-7c6c-4e99-ac9a-4f43d594220d.png"> | <img width="1604" alt="edit post" src="https://user-images.githubusercontent.com/74673566/232229948-b2c704d3-a35b-41d8-80b5-b53432517a4d.png">|



