import { config, library, dom } from '@fortawesome/fontawesome-svg-core';
config.autoReplaceSvg = 'nest';

import { 
 faArrowLeft,
 faArrowRight,
 faCaretUp,
 faCaretDown,
 faStar,
 faCheck,
 faSpinner } from '@fortawesome/free-solid-svg-icons';

library.add(
 faArrowLeft,
 faArrowRight,
 faCaretUp,
 faCaretDown,
 faStar,
 faCheck,
 faSpinner);

 // Kicks off the process of finding <i> tags and replacing with <svg>
dom.watch();