## 1. Liste de tous les praticiens

```http
http://localhost:8055/items/Praticien
```

---

## 2. La spécialité d’ID 2

```http
http://localhost:8055/items/Specialite/2
```

---

## 3. La spécialité d’ID 2 avec uniquement son libellé

```http
http://localhost:8055/items/Specialite/2?fields=libelle
```

---

## 4. Un praticien avec sa spécialité (libellé)

```http
http://localhost:8055/items/Praticien?fields=nom,prenom,specialite.libelle
```

---

## 5. Une structure (nom, ville) avec la liste des praticiens rattachés (nom, prénom)

```http
http://localhost:8055/items/Structure?fields=nom,ville,praticiens.nom,praticiens.prenom
```

---

## 6. Idem en ajoutant le libellé de la spécialité des praticiens

```http
http://localhost:8055/items/Structure?fields=nom,ville,praticiens.nom,praticiens.prenom,praticiens.specialite.libelle
```

---

## 7. Les structures dont le nom de la ville contient "sur" avec la liste des praticiens (nom, prénom, spécialité)

```http
http://localhost:8055/items/Structure?filter[ville][_contains]=sur&fields=nom,ville,Praticiens.nom,Praticiens.prenom,Praticiens.Specialite.libelle
```

