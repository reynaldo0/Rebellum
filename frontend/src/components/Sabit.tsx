import { Canvas, extend } from "@react-three/fiber";
import { Suspense, useRef } from "react";
import Loader from "./Loader";
import { Environment, OrbitControls } from "@react-three/drei";
import { useRotateAnimation } from "../func/rotateAnimation";
import { Group } from "three";
import Kapsul from "./models/Kapsul";
import Botol from "./models/Botol";
import Obat from "./models/Obat";
import { useFloatAnimation } from "../func/floatAnimation";
import Celurit from "./models/Celurit";

extend({ OrbitControls });

const Scene = () => {
  const rotateGroupRef = useRef<Group>(null!);
  const kapsul1Ref = useRef<Group>(null!);
  const kapsul2Ref = useRef<Group>(null!);
  const botol1Ref = useRef<Group>(null!);
  const botol2Ref = useRef<Group>(null!);
  const obatRef = useRef<Group>(null!);

  useRotateAnimation(rotateGroupRef);

  useFloatAnimation(kapsul1Ref, 1000);
  useFloatAnimation(kapsul2Ref, 1100);
  useFloatAnimation(botol1Ref, 500);
  useFloatAnimation(botol2Ref, 700);
  useFloatAnimation(obatRef, 900);

  return (
    <>
      <OrbitControls enablePan={false} enableZoom={false} autoRotate={false} />
      <ambientLight intensity={8} />

      <group position={[0, 20, 0]}>
        <directionalLight intensity={5} position={[30, 50, 30]} />
        <directionalLight intensity={5} position={[-30, -15, -30]} />

        <group ref={rotateGroupRef}>
          <Celurit
            isHovered
            scale={25}
            position={[-20, 0, 0]}
            rotation={[0, 0, Math.PI / 6]}
          />
          <Celurit
            isHovered
            scale={25}
            position={[20, 0, 0]}
            rotation={[0, Math.PI, Math.PI / 6]}
          />
        </group>

        <group position={[0, -20, 0]}>
          <group ref={kapsul1Ref}>
            <Kapsul
              scale={5}
              position={[20, 0, -10]}
              rotation={[0, 0, Math.PI / 8]}
            />
          </group>
          <group ref={kapsul2Ref}>
            <Kapsul
              scale={5}
              position={[-35, -25, 10]}
              rotation={[0, 0, Math.PI / -4]}
            />
          </group>
          <group ref={botol1Ref}>
            <Botol
              scale={30}
              position={[-25, 0, -5]}
              rotation={[0, 0, Math.PI / 8]}
            />
          </group>
          <group ref={botol2Ref}>
            <Botol
              scale={30}
              position={[45, 10, 10]}
              rotation={[0, 0, Math.PI / -6]}
            />
          </group>
          <group ref={obatRef}>
            <Obat
              scale={10}
              position={[40, -30, -5]}
              rotation={[0, Math.PI / 2, Math.PI / 4]}
            />
          </group>
        </group>
      </group>
    </>
  );
};

const Sabit = () => {
  return (
    <Canvas
      className="h-[350px] w-screen md:h-[300px] md:w-[500px]"
      camera={{ position: [0, 0, 82] }}>
      <Suspense fallback={<Loader />}>
        <Scene />
        <Environment preset="sunset" />
      </Suspense>
    </Canvas>
  );
};

export default Sabit;
