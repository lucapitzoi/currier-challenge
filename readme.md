# Currier Challenge

This repo contain an example of currier implementation.

## Setup Development Environment

- Setup env: `cp .env.local .env`
- Setup docker compose: `cp docker-compose.local.yml docker-compose.yml`
- Start environment: `docker-compose up -d`

# API Examples

- [DHL](http://51.195.61.85:8091/api/v1/currier/shipments?trackingNumber=7777777770&currierSlug=dhl)
- [Bartolini](http://51.195.61.85:8091/api/v1/currier/shipments?trackingNumber=7777777770&currierSlug=brt)