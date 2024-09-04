containerName=$1

# start docker
printf "Start docker\n"
open -j -a Docker

containers=$(docker ps -a -q --filter="name=$containerName")
if [ -n "$containers" ]; then
  printf "Start container: $containerName\n"
  docker start $containers
fi
