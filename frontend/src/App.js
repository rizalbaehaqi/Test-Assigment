import React, { useEffect, useState } from "react";

function App() {
  const [komisi, setKomisi] = useState([]);

  useEffect(() => {
    fetch("http://localhost:8000/index.php?action=get_komisi")
      .then((res) => res.json())
      .then((data) => setKomisi(data))
      .catch((err) => console.error("Error:", err));
  }, []);

  return (
    <div style={{ padding: "20px" }}>
      <h2>Data Komisi Marketing</h2>
      <table border="1" cellPadding="8" cellSpacing="0">
        <thead>
          <tr>
            <th>Marketing</th>
            <th>Bulan</th>
            <th>Omzet</th>
            <th>Komisi (%)</th>
            <th>Komisi (Rp)</th>
          </tr>
        </thead>
        <tbody>
          {komisi.map((item, index) => (
            <tr key={index}>
              <td>{item.marketing}</td>
              <td>{item.bulan}</td>
              <td>{item.omzet.toLocaleString()}</td>
              <td>{item.komisi_persen}</td>
              <td>{item.komisi_nominal.toLocaleString()}</td>
            </tr>
          ))}
        </tbody>
      </table>
    </div>
  );
}

export default App;
