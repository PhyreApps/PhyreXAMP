containerName=$1
containers=$(docker ps -a -q --filter="name=$containerName")
if [ -n "$containers" ]; then
  printf "Start container: $containerName\n"
  docker start $containers
fi
