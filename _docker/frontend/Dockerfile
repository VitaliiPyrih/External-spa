FROM node:current-alpine as build-stage
WORKDIR /app
COPY ./frontend/package*.json ./
RUN npm install
COPY ./frontend/ .
RUN npm run build

FROM nginx as production-stage
EXPOSE 3000
RUN mkdir /app
COPY ./_docker/frontend/nginx.conf /etc/nginx/conf.d/default.conf
COPY --from=build-stage /app/dist /app