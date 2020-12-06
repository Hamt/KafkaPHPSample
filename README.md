# 사용방법

## Setup

### Kafka 토픽 생성
```
~/kafka/bin/kafka-topics.sh --create --zookeeper localhost:2181 --replication-factor 1 --partitions 1 --topic test
```

### kafka-php 설치
```
composer require nmred/kafka-php
```

### Consumer실행
```
php ./Consumer.php
```


### Producer 실행
```
php ./Producer.php "minusQuantity: {service_id:22, sku: 15432, qty: 2}"
```

### 참고 문헌
[demyanov.dev](https://demyanov.dev/using-php-apache-kafka)

[www.digitalocean.com](https://www.digitalocean.com/community/tutorials/how-to-install-apache-kafka-on-centos-7)
