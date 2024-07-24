docker rm -f $(docker ps -aq)  # to clear containers

docker rmi -f $(docker images -q)  # to clear images
