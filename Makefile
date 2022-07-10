all: help

help:
	@echo "Usage:"
	@echo "    make start                #start the app"
	@echo "    make update-autoload      #rebuild the autoload file"

start:
	php -S localhost:9997 -t public/

update-autoload:
	composer dumpautoload

.PHONY: all start update-autoload
