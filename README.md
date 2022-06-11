# Automatic Send Mail for remainder
## _22-1 OSS Section2 Final Project_

This Project create for OSS Final Project
make by 21700467 JYY

## Who need this program

- For those who can't concentrate to do today
- For those who need to keep reminding to focus
- For those who want to turn Google Mail into a alarm clock

## Features

- Send mail every 08, 11, 14, 17, 20, and 23 hour for a day
- Send mail to yourself
- Send mail with different content in the morning, weekdays, and midnight

## Tech

ASM uses open source projects and developer source to work properly:

- [PHP] - computer langauge for server function
- [Apache] - the virtual server executing the program (you can use other server or virtual server if need)
- [PHPmailer] - core of send mail automaticaly
- [Google mail SMTP] - set of mail form to use g-mail (if you want to use another mail, need to find right SMTP)

## Installation

ASM requires sever or virtual server and [PHPmailer] to run.
This repository include PHPmailer lib. So, it does not need to install PHPmailer.
However, if program does't executed, try install [PHPmailer].

Install repository with git and start the server.

```sh
git clone https://github.com/HyperionY/asm.git
```

Alternatively, if you’re not using 'git clone', you
can download ASM as a zip file, then unzip the ASM file into one of the include_path directories specified in your PHP configuration.

## Functions

ASM is composed two function in the form of a PHP file.

| Function | Popose |
| ------ | ------ |
| automail.php | This file include 'automaticMailer()' function and compose set for send mail  |
| autosend_routine.php | This file make for execute cycle of send mail. If you want to run this program execute autosend_routine.php on server |

## Things to improve

- Conect DB to provide various content to be used in mail-body
- Problem of over-push mail sometime
- Modify delay to reduce execute time during execute on server
- Security problem

## License

MIT

## Presentation video link

[link](<https://youtu.be/bo2VuFvK1BQ>)

[//]: # 
   [PHP]: <https://www.php.net/>
   [Apache]: <https://httpd.apache.org/>
   [PHPmailer]: <https://github.com/PHPMailer/PHPMailer>
   [Google mail SMTP]: <https://support.google.com/mail/answer/7126229?hl=en>

