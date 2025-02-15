import { Canvas } from "@react-three/fiber";
import { Environment, OrbitControls } from "@react-three/drei";
import Logos from "./models/Logos"; 
import { Suspense } from "react";
import Loader from "./Loader";

const Scene = () => {
  return (
    <>
      <OrbitControls enableZoom={false} autoRotate={true} autoRotateSpeed={5} />
      <ambientLight intensity={0.5} />
      <pointLight intensity={100} position={[0, 10, 30]}  />

      <Logos position={[0, -15, 0]} />

      <Environment preset="dawn" />
    </>
  );
};

const Logo = () => {
  return (
    <Canvas
      className="h-[250px] w-[80vw] md:h-[350px] md:w-[600px]"
      camera={{ position: [0, 0, 82] }}>
      <Suspense fallback={<Loader />}>
        <Scene />
      </Suspense>
    </Canvas>
  );
};

export default Logo;
