containerName=$1
containers=$(docker ps -a -q --filter="name=$containerName")
if [ -n "$containers" ]; then
  printf "Stopping container: $containerName\n"
  docker stop $containers
fi
