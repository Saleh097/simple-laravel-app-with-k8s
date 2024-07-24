docker login

docker build -t simple-lara .   # <image name> .

docker tag simple-lara saleh097/simple-lara:latest   # <image name> <username>/<target-image-name>:<version>

docker push saleh097/simple-lara:latest
