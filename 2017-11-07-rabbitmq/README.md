# Message broker RabbitMQ
Základní příklady a použití RabbitMQ.

# Požadavky pro spuštění příkladů
Nainstalovat [Docker](https://docs.docker.com/engine/installation/#platform-support-matrix)

# Použití
1. spusťte příkaz 
    
    `docker run -d -p 15673:15672 -p 5673:5672 --hostname rabbitmqjb --name rabbitjb rabbitmq:3.6-management-alpine`
    
    1. [RabbitMQ Management console](http://localhost:15673/#/)vám pak bězí na localhost portu 15673
       <http://localhost:15673/#/>
    2. pro připojení ve vašich aplikacích na RabbitMQ je nutné zadat port 5673 viz. bootstrap.php

2. spustit příkaz `composer install` 

## Tipy a triky

`docker system prune` - "vyčistí" vaše docker prostředí

`docker ps` - zobrazí seznam běžících containerů

`docker stop rabbitjb` - zastaví instanci RabbitMQ

`docker restart rabbitjb` - restartuje instanci RabbitMQ
