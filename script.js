document.getElementById('run-btn').addEventListener('click', () => {
    const html = document.getElementById('html-code').value;
    const css = `<style>${document.getElementById('css-code').value}</style>`;
    const js = document.getElementById('js-code').value;
  
    const output = document.getElementById('output');
    const iframeDoc = output.contentDocument || output.contentWindow.document;
  
    // Clear the iframe content
    iframeDoc.open();
    iframeDoc.write('');
    iframeDoc.close();
  
    // Inject HTML and CSS
    iframeDoc.body.innerHTML = html + css;
  
    // Create a script tag for JavaScript and inject it
    const scriptTag = iframeDoc.createElement('script');
    scriptTag.textContent = js;
    iframeDoc.body.appendChild(scriptTag);
  });
  