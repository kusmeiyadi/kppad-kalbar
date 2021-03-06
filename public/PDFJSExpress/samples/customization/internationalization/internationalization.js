// @link WebViewerInstance: https://www.pdftron.com/api/web/WebViewerInstance.html
// @link WebViewerInstance.setLanguage: https://www.pdftron.com/api/web/WebViewerInstance.html#setLanguage__anchor

WebViewer(
  {
    path: '../../../lib',

    initialDoc: 'https://pdftron.s3.amazonaws.com/downloads/pl/demo-annotated.pdf',
  },
  document.getElementById('viewer')
).then(instance => {
  samplesSetup(instance);
  document.getElementById('form').onchange = e => {
    // Set language
    instance.setLanguage(e.target.id);
  };
});
