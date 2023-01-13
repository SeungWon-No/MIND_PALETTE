class UploadAdapter {
    constructor(loader) {
        this.loader = loader;
    }

    upload() {
        return this.loader.file.then( file => new Promise(((resolve, reject) => {
            this._initRequest();
            this._initListeners( resolve, reject, file );
            this._sendRequest( file );
        })))
    }
  
    _initRequest() {
      const xhr = (this.xhr = new XMLHttpRequest())
      xhr.open('POST', '/editor/upload', true) 
      xhr.setRequestHeader(
        'X-CSRF-TOKEN', $('input[name="_token"]').val()
      )
      xhr.responseType = 'json'
    }
  
    _initListeners(resolve, reject, file) {
      const xhr = this.xhr
      const loader = this.loader
      const genericErrorText = '파일업로드 실패 - 관리자에게 문의하세요.'
  
      xhr.addEventListener('error', (err) => {
        // console.log(err)
        reject(genericErrorText)
      })
      xhr.addEventListener('abort', () => reject())
      xhr.addEventListener('load', () => {
        const response = xhr.response
        if (!response || response.error) {
          return reject(
            response && response.error ? response.error.message : genericErrorText
          )
        }
  
        resolve({
          default: response.url, //업로드된 파일 주소
        })
      })
    }
  
    _sendRequest(file) {
      const data = new FormData()
      data.append('upload', file)
      this.xhr.send(data)
    }
  }