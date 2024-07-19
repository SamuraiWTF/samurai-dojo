Samurai-Dojo
============

Samurai-Dojo is a set of vulnerable web applications created by and for the Samurai security training and testing distributions like SamuraiSTFU and SamuraiWTF.  These vulnerabile applications include:

  - Dojo Basic:  A simple PHP app that can be used for demos and exercises
  - Dojo Scavenger:  A student CTF-like challenge to test penesting skills

Each app is located in its respective folder, than can be moved the the appropriate location for web root on your server.  Sample apache configuration files (needed at least for scavenger's challenge) are also provided and need to be moved to the /etc/apache2/sites-available/ folder on Debian/Ubuntu or integrated in your apache configuration file on other distributions.

## Running Samurai Dojo Applications

You can run Samurai Dojo-Basic either using Vagrant or Docker. Choose the method that best suits your environment and preferences.

### Option 1: Using Vagrant

1. Install [Vagrant](https://www.vagrantup.com/) and [VirtualBox](https://www.virtualbox.org/).
2. Clone this repository.
3. Navigate to the project directory in your terminal.
4. Run `vagrant up`. This will create a virtual machine that shares a drive with the host machine.
5. When done, set up your hosts file as listed below.
6. Connect to the web interface and reset the database.

### Option 2: Using Docker (Recommended!)

1. Install [Docker Desktop](https://docs.docker.com/desktop/) if you don't already have it.
2. Clone this repository.
3. Navigate to the project directory in your terminal.
4. Run `docker-compose up -d`. This will build and start the containers (dojo-basic, dojo-scavenger, and required databases) in detached mode.
5. The application should now be accessible at `http://localhost:30080` for the basic PHP app and `http://localhost:31080` for the scavenger app.
6. To stop the containers, run `docker-compose down`.

## Regarding the helpdesk application 

You may find some references to a helpdesk application. Consider this a work in progress that is not normally used (yet).
It should running at http://127.0.0.1:32080.

## Setting up your hosts file

Add the following entries to your hosts file:

```
127.0.0.2       dojo-basic
127.0.0.2       dojo-basic.wtf
```

On Unix-like systems (including macOS), the hosts file is located at `/etc/hosts`.
On Windows, it's located at `C:\Windows\System32\drivers\etc\hosts`.

## Resetting the Database

After setting up, connect to the web interface and use the "Reset DB" option in the "Pentester Help" menu to initialize the database.

## Security Warning

This application is deliberately vulnerable. DO NOT run this on a production network or any network exposed to the internet. Use it only on a private, isolated network or local development environment.

## Contributing

Contributions to improve Samurai Dojo-Basic are welcome. Please submit pull requests or open issues on the GitHub repository.

## License

[Insert license information here]

## Credits

Originally created by Justin Searle
Maintained by the SamuraiWTF team

Samurai Dojo-Basic is a [SamuraiWTF](http://github.com/SamuraiWTF) Project.