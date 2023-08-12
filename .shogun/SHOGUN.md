# Shogun Support for Samurai-Dojo

The `.shogun` directory contains essential files for building and testing the Samurai-Dojo labs. These labs include "basic" and "scavenger," each consisting of a PHP web application talking to its respective MySQL database.

## Files Explanation

- `Dockerfile.dojo-basic`: Dockerfile for the "basic" lab's PHP web application.
- `Dockerfile.dojo-basic-db`: Dockerfile for the "basic" lab's MySQL database.
- `Dockerfile.dojo-scavenger`: Dockerfile for the "scavenger" lab's PHP web application.
- `Dockerfile.dojo-scavenger-db`: Dockerfile for the "scavenger" lab's MySQL database.
- `dojo-basic.sql`: SQL script for initializing the "basic" lab's database.
- `docker-compose-dojo-basic.yml`: Compose file for locally testing the "basic" lab.
- `docker-compose-dojo-scavenger.yml`: Compose file for locally testing the "scavenger" lab.

## Local Testing

To run a local test of the containers, navigate to the project root directory and use the following commands for the specific lab you want to test.

### Dojo Basic

```bash
docker-compose -f .shogun/docker-compose-dojo-basic.yml up
```
### Dojo Scavenger
```bash
docker-compose -f .shogun/docker-compose-dojo-scavenger.yml up
```

Once the containers are up and running, you can access the web application at http://localhost:8080 and http://localhost:8081 for the "basic" and "scavenger" labs, respectively.

## Cleanup
To stop and remove the containers, use the following command:

```bash
docker-compose -f .shogun/docker-compose-dojo-<lab-name>.yml down
```

Replace `<lab-name>` with either `basic` or `scavenger` depending on which environment you are testing.




