
const createLink =( href ,async = true )=>{
    return new Promise((resolve, reject) => {
        const script = document.createElement('script');
        script.src = href;
        script.async = async;
        script.onload = () => resolve();
        script.onerror = () => reject(`Error loading script: ${src}`);
        document.head.appendChild(script);
      });
};

// Function to create and load script
const createScript = (src, async = true) => {
    return new Promise((resolve, reject) => {
      const script = document.createElement('script');
      script.src = src;
      script.async = async;
      script.onload = () => resolve();
      script.onerror = () => reject(`Error loading script: ${src}`);
      document.head.appendChild(script);
    });
  };
