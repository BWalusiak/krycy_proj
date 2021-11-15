FROM debian 
# FROM biedan

WORKDIR /home/walusiak

RUN apt update && apt install -y wget chromium netcat

COPY ./walusiak_sim.sh /app/walusiak_sim.sh
RUN chmod +x /app/walusiak_sim.sh

COPY TOP_SECRET /home/walusiak

RUN echo "set -o history" >> /etc/bash.bashrc
ENV HISTFILE="/home/walusiak/.bash_history"

ENTRYPOINT ["/app/walusiak_sim.sh"]

