# Aplikacioni për Kërkimin dhe Menaxhimin e Ilaçeve

Ky aplikacion mundëson kërkimin e medikamenteve përmes NDC code duke përdorur [OpenFDA API](https://open.fda.gov/apis/drug/ndc/), si dhe ruajtjen e tyre në databazën lokale për menaxhim të mëvonshëm.

---

## 🔧 Udhëzime Instalimi

1. **Bëje clone projektin:**
```bash
git clone https://github.com/DelfinaHasani/medicine-search-app
cd medicine-search-app/backend
```

2. **Instalo varësitë:**
```bash
composer install
npm install && npm run dev
```

3. **Krijo `.env` file:**
```bash
cp .env.example .env
```

4. **Gjenero çelësin e aplikacionit:**
```bash
php artisan key:generate
```

5. **Krijo databazën në MySQL** dhe vendosi të dhënat e saj në `.env` file.

6. **Ekzekuto migrimet:**
```bash
php artisan migrate
```

7. **Nis serverin lokal:**
```bash
php artisan serve
```

---

## ⚙️ Funksionalitet dhe Logjika e Implementuar

- ✅ Autentifikimi i përdoruesve me **Laravel Breeze**
- 🔎 Kërkimi i ilaçeve sipas **NDC Code** përmes **OpenFDA API**
- 💾 Ruajtja e rezultateve të kërkimit në **databazë lokale**
- 📄 Pamja për të shfaqur **të gjitha medikamentet e ruajtura**
- 📑 Paginimi për rezultatet e ruajtura
- ❌ Fshirja individuale e medikamenteve të ruajtura
- ⏳ **Spinner** që tregon kur kërkimi është në progres
- 📤 Eksportimi i të dhënave të ruajtura në **CSV**

---

## 💡 Ide për Përmirësime

- 🔍 Shtimi i **filtrimit të rezultateve** të ruajtura (sipas prodhuesit, datës, etj.)
- 👥 **Role të ndryshme përdoruesish** (admin, user)
- 📊 Grafiqe statistikore mbi ilaçet më të kërkuara
- 🗂️ Sistemi i **logimit për kërkime dhe veprime**

---
