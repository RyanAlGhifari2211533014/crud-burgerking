<div class="form-container">
    <form>
        <h2>Lengkapi data diri kamu!</h2>
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama">
        </div>
        
        <div class="form-group">
            <label for="phone">No Handphone</label>
            <div class="phone-container">
                <span>+62</span>
                <input type="text" id="phone" name="phone">
            </div>
        </div>
        
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email">
        </div>
        
        <div class="form-group">
            <label for="dob">Tanggal Lahir</label>
            <input type="date" id="dob" name="dob">
        </div>
        
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea id="alamat" name="alamat"></textarea>
        </div>
        
        <h2>Detail Acara!</h2>
        
        <div class="form-group">
            <label for="jenis-acara">Jenis Acara</label>
            <input type="text" id="jenis-acara" name="jenis-acara">
        </div>
        
        <div class="form-group">
            <label for="waktu">Waktu</label>
            <select id="waktu" name="waktu">
                <option value="pagi">Pagi</option>
                <option value="siang">Siang</option>
                <option value="sore">Sore</option>
                <option value="malam">Malam</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="tanggal-acara">Tanggal Acara</label>
            <input type="date" id="tanggal-acara" name="tanggal-acara">
        </div>
        
        <div class="form-group">
            <label for="catatan">Catatan</label>
            <textarea id="catatan" name="catatan" placeholder="Tulis request/order menu lain di sini!"></textarea>
        </div>
        
        <button type="submit">SUBMIT</button>
    </form>
</div>
