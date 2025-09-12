# command for init project
init: build install

# command for start app
up:
	docker compose up -d

# command for build app
build:
	docker compose up -d --build

# command for exec in app container
exec:
	docker exec -it emojis /bin/sh

# command for install composer
install:
	docker exec -i emojis composer install --dev

# command for run lint code
lint:
	docker exec -i emojis composer lint

# command for run lint code
lint-fix:
	docker exec -i emojis composer lint-fix

# command for run tests
test:
	docker exec -i emojis composer tests

# command for run tests coverage
test-coverage:
	docker exec -i emojis composer tests-coverage

# command for run tests mutation
test-mutation:
	docker exec -i emojis composer tests-mutation

