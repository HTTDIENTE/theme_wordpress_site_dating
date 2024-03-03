export default function addStyle(href, media = 'all') {
  return new Promise(( (resolve, reject) => {
    const linkElement = document.createElement('link');
    linkElement.setAttribute('rel', 'stylesheet');
    linkElement.setAttribute('type', 'text/css');
    linkElement.setAttribute('href', href);
    linkElement.setAttribute('media', 'print');

    linkElement.addEventListener('load', () => {
      linkElement.setAttribute('media', media);
      resolve(linkElement);
    }, {
      once: true,
    });

    linkElement.addEventListener('error', (event) => {
      reject(new Error(event.message));
    }, {
      once: true,
    });

    document.head.appendChild(linkElement);
  } ));
}
