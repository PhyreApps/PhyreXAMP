containerName=$1

# get docker container status
containerStatus=$(docker inspect --format='{{.State.Status}}' $containerName 2>/dev/null)

if [ -z "$containerStatus" ]; then
  printf "Container $containerName does not exist\n"
elif [ "$containerStatus" == "running" ]; then
  printf "Container $containerName is running\n"
else
  printf "Container $containerName is not running\n"
fi
