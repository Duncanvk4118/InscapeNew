import Laptops from "./laptops.js";

const superlaptop = new Laptops(
  "Test",
  10000,
  "Macbook",
  "M1",
  512,
  16,
  "SSD",
  true
);
console.log(superlaptop);

const content = `
    <main>
        <h2>${superlaptop.name} Laptop</h2>
        <ul>
            <li>Name: ${superlaptop.name} </li>
            <li>Type: ${superlaptop.merk} ${superlaptop.type} Silicon</li>
            <li>Price:€ ${superlaptop.price},-</li>
            <li>Memory: ${superlaptop.storage} GB</li>
            <li>RAM: ${superlaptop.ram} GB</li>
            <li>Disk Type: ${superlaptop.driver}</li>
        </ul>
    </main>
`;

document.body.innerHTML = content;
