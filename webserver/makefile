GRAILS_VERSION="1.3.6"
GRAILS_HOME := $(subst grails-1.3.5,grails-${GRAILS_VERSION},${GRAILS_HOME})
PATH := $(subst grails-1.3.5,grails-${GRAILS_VERSION},${PATH})

integration-test:
	@echo ${GRAILS_HOME}
	@echo ${PATH}
	${GRAILS_HOME}/bin/grails clean --non-interactive
	${GRAILS_HOME}/bin/grails compile --non-interactive
	${GRAILS_HOME}/bin/grails test-app -integration

run-app:
	@echo ${GRAILS_HOME}
	@echo ${PATH}
	${GRAILS_HOME}/bin/grails clean --non-interactive
	${GRAILS_HOME}/bin/grails compile --non-interactive
	${GRAILS_HOME}/bin/grails run-app 

