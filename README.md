# PHP ASK SDK

This repository contains an (experimental) API SDK for Alexa's Skill Management API written in PHP.

## Authentication

Quite unfortunately the only supported OAuth2 grant type is "authorization code", which forces the user to authenticate
using a browser. In order to make things a bit simpler, there are two helper make targets that automate some parts of the process. 

### Obtain an access token

```
make token
```

### Write a new access token in the .env file

```
make env-renew-token
```

### Notes

Tokens are stored in ~/.ask/cli_config
