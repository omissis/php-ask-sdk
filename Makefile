.PHONY: vendor

token:
	@printf 'n\n' | ask init -p default >/dev/null 2>&1 && cat ~/.ask/cli_config | jq -r '.profiles.default.token.access_token' | head -n 1

env-renew-token:
	@$(eval FOO:=$(shell $(MAKE) token))
	@sed -i 's/^PHP_ASK_SDK_OAUTH_TOKEN\=.*/PHP_ASK_SDK_OAUTH_TOKEN=${FOO}/' .env
