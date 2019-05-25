# PHP ASK SDK

This repository contains an (experimental) API SDK for Alexa's Skill Management API written in PHP.

## Local Testing

In order to test it locally, you need to have an account on the [Alexa Developer Console](https://developer.amazon.com/alexa/console/ask) as well as a configured skill.

Once that's in place, create a `.env` file in the root of this repo and fill in the skill id.

Last, run `make env-renew-token`: that should open a browser and write a token in your env file once you authenticate.

You are now ready to try the examples by running `php examples/get_skill.php` and start tinkering with your skill.

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
