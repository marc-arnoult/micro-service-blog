FROM node:latest


RUN mkdir -p /code
RUN npm install -g @vue/cli-service-global
COPY . /code

WORKDIR /code

CMD ["npm", "run", "serve"]
EXPOSE 8080