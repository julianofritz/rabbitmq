# rabbitmq

repository with some simple examples using PHP (vanilla) and rabbitmq

## Rabbitmq docker container
- docker run -it --rm --name rabbitmq -p 5672:5672 -p 15672:15672 rabbitmq:3.10-management

### Management panel
    - Host: http://localhost:15672
    - user: guest
    - password: guest

### Access Container
- docker exec -it rabbitmq sh
