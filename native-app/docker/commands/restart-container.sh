containerName=$1
containers=$(docker ps -a -q --filter="name=$containerName")
if [ -n "$containers" ]; then
  printf "Restarting container: $containerName\n"
  docker restart $containers
fi
