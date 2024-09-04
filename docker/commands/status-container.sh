containerName=$1
containers=$(docker ps -a -q --filter="name=$containerName")
if [ -n "$containers" ]; then
    printf "Container $containerName is running\n"
    else
    printf "Container $containerName is not running\n"
fi
