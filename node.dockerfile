#base image
FROM node

# set working directory
RUN mkdir /usr/src/app
#copy all files from current directory to docker

#COPY ./frontend /usr/src/app

WORKDIR /usr/src/app

# add `/usr/src/app/node_modules/.bin` to $PATH
ENV PATH /usr/src/app/node_modules/.bin:$PATH

# install and cache app dependencies
# RUN yarn

# CMD ["npm", "start"]
