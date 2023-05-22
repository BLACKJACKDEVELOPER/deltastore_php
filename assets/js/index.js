

function init() {

	//*****************
	const PATH = window.location.pathname.split('/deltastore/index.php').pop()
	//*****************

	//getFolder
	fetch('http://localhost/deltastore/api/getfolder.php').then(doc=> doc.text()).then(res=> {
		let data = res.split(',]').shift()+']'
		data = JSON.parse(data)
		let folderDOM = ``;
		for (let i = 0;i < data.length;i++) {
			folderDOM += 
			`
				<a class="fo" href="http://localhost/deltastore/index.php?folder=${data[i].fo_id}">
				<i class="icon folder"></i>${data[i].fo_name}
				</a>
			`
		}
			document.getElementById('fo_box').innerHTML = folderDOM
	})

	// get base64
	function base64(file) {
		return new Promise((resolve,reject)=> {
			const reader = new FileReader()
			reader.readAsDataURL(file)
			reader.onload = ()=> resolve(reader.result)
			reader.onerror = ()=> reject(false)
		})
	}
const urlParams = new URLSearchParams(location.search).get('folder') ? new URLSearchParams(location.search).get('folder') : '';
	// public method
	return {
		uploadFile:async ()=> {
			const input = document.createElement('input')
			input.setAttribute('type','file')
			input.setAttribute('multiple','')
			const post = urlParams.length > 0 ? `http://localhost/deltastore/api/upload.php?folder=${urlParams}` : `http://localhost/deltastore/api/upload.php`

			// event pickup file
			input.addEventListener('change',async()=> {
				for (let i = 0;i < input.files.length;i++) {
					const data = await base64(input.files[i])
					const FORM = new FormData()
					FORM.append('data',data.split(';base64,').pop())
					FORM.append('name',input.files[i].name)
					fetch(post,{
						method:"POST",
						body:FORM
					}).then(res=> res.json()).then(async (ress)=> {
						ress ? Swal.fire({position:'top-end',title: 'อัพโหลดสำเร็จ!!',html: `อัพโหลด ${input.files[i].name} สำเร็จแล้ว!!`,timer: 2000,timerProgressBar: true}) : ''
					})
				}
				window.location.reload()
			})

			input.click()
		},
		createFolder:async ()=> {
			const folderName = prompt('Name of folder : ')
			folderName ? (fetch(`http://localhost/deltastore/api/createfolder.php?name=${folderName}`).then(doc=> doc.json()).then(res=> res ? window.location.reload(true) : '')) : ''
		},
		download:async (id)=> {
			fetch('http://localhost/deltastore/api/download.php?id='+id)
			.then(doc=> doc.text()).then(res=> {
				const download = document.createElement('a')
				download.setAttribute('href',`data:image/png;base64,${res}`)
				download.setAttribute('download','')
				download.click()
				return
			})
		},
		delete:async (id)=> {
			fetch('http://localhost/deltastore/api/delete.php?id='+id).then(doc=>doc.json()).then(res=> {
				res ? window.location.reload(true) : alert('SOMETHING WENT WRONG!');
			})
		},
		logout:async ()=> {
			window.location.href = 'logout.php'
		}
	}

}
// ระบบจัดเก็บไฟล์


// start init()
const public = new init()
