import Vue from 'vue'
import fontawesome from '@fortawesome/fontawesome'
import FontAwesomeIcon from '@fortawesome/vue-fontawesome'

// import { } from '@fortawesome/fontawesome-free-regular/shakable.es'

import {
  faUser, faLock, faSignOutAlt, faCog, faPlusSquare, faExclamationCircle, faCheckCircle, faInfoCircle, faEnvelope, faUserCircle, faSearch, faWrench
} from '@fortawesome/fontawesome-free-solid/shakable.es'

import {
  faGithub
} from '@fortawesome/fontawesome-free-brands/shakable.es'

fontawesome.library.add(
  faUser, faLock, faSignOutAlt, faCog, faGithub, faPlusSquare,  faExclamationCircle, faCheckCircle, faInfoCircle, faEnvelope, faUserCircle, faSearch, faWrench
)

Vue.component('fa', FontAwesomeIcon)
