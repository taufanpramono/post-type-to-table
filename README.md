##post type to table v.1

**Cara menggunakan kode PHP**
1. gunakan plugin code snippet / snippet code, atau dapat diletakan pada file function.php pada tema yang anda miliki
2. ganti  'post_type' => 'event', berdasarkan dengan slug custom post type yang kamu miliki 'post_type' => 'event-lainnya-contoh'
3. untuk $current_date & $event_type anda bisa menggunakan plugin lain seperti JetEnggine -> Metabox atau Metafield. pada update kali ini kita menggunakan ACF Field sebagai custom field. 
sehingga metode pemanggilan datanya menggunakan get_field('nama_field');. pastikan output berbentuk tanggal event (date) & jenis event (text)

**cara menggunakan Styling CSS**
1. anda dapat menempatkan kode CSS atau styling pada Appearance > Customize > additional Css

**output Frotnend**
1. gunakan shortcode [data_event]

**screenshoot**
1. data source post type : https://prnt.sc/revmVmuxHhuq
2. Add New Post Type : https://prnt.sc/lZ0J_QRBSXCj
3. Ouput on Pages : https://prnt.sc/H-WHnnIiq-rU








